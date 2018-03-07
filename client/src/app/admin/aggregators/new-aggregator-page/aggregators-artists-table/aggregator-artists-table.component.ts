import {Component, Input, OnInit, ViewEncapsulation} from '@angular/core';
import {FormControl} from "@angular/forms";
import {ModalService} from "../../../../shared/modal/modal.service";
import {Album} from "../../../../shared/types/models/Album";
import {Artist} from "../../../../shared/types/models/Artist";
import {CreateRequestModalComponent} from "../../create-artist-modal/create-artist-modal.component";
import {ConfirmModalComponent} from "../../../../shared/modal/confirm-modal/confirm-modal.component";
import {Artists} from "../../../../web-player/artists/artists.service";
import {Settings} from "../../../../shared/settings.service";
import {utils} from "../../../../shared/utils";

import {Aggregator} from "../../../../shared/types/models/Aggregator";

@Component({
    selector: 'aggregator-artists-table',
    templateUrl: './aggregator-artists-table.component.html',
    styleUrls: ['./aggregator-artists-table.component.scss'],
    encapsulation: ViewEncapsulation.None
})
export class AggregatorArtistsTableComponent implements OnInit {

    /**
     * Form control for DataTable search input.
     */
    public searchQuery = new FormControl();

    /**
     * Whether all tracks are currently selected.
     */
    public allArtistsSelected: boolean = false;

    /**
     * All currently selected artists.
     */
    public selectedArtists = [];

    /**
     * Albums filtered by search query.
     */
    public filteredArtists: Artist[] = [];

    /**
     * Aggregator artists belong to.
     */
    @Input() aggregator: Aggregator;

    /**
     * ArtistAlbumsTableComponent Constructor.
     */
    constructor(
        private modal: ModalService,
        private artists: Artists,
        private settings: Settings
    ) {}

    ngOnInit() {
        this.bindSearchQuery();
        this.filteredArtists = this.aggregator.artists.slice();
    }

    /**
     * Confirm and delete selected artists.
     */
    public maybeDeleteSelectedArtists() {
        this.modal.show(ConfirmModalComponent, {
            title: 'Delete Artists',
            body: 'Are you sure you want to delete selected artists?',
            ok: 'Delete'
        }).onDone.subscribe(async () => {
            let ids = this.selectedArtists.filter(identifier => {
                return this.filteredArtists.find(curr => this.getIdentifier(curr) === identifier).id;
            });

            console.log(ids);

            if (ids.length) {
                await this.artists.delete(ids).toPromise();
            }

            this.selectedArtists.forEach(identifier => {
                let i = this.filteredArtists.findIndex(curr => this.getIdentifier(curr) === identifier);
                let k = this.aggregator.artists.findIndex(curr => this.getIdentifier(curr) === identifier);
                this.filteredArtists.splice(i, 1);
                this.aggregator.artists.splice(k, 1);
            });

            this.deselectAllItems();
        });
    }

    /**
     * Open modal for creating a new album.
     */
    public openNewArtistModal() {
        this.deselectAllItems();

        this.modal.show(CreateRequestModalComponent, {aggregator: this.aggregator}).onDone.subscribe(artist => {
            artist = this.setIdentifier(artist);
            this.aggregator.artists.push(artist);
            this.filteredArtists.push(artist);
        });
    }

    /**
     * Open modal for editing existing artist.
     */
    public openEditArtistModal(artist: Artist) {
        this.deselectAllItems();

        this.modal.show(CreateRequestModalComponent, {aggregator: this.aggregator, artist}).onDone.subscribe(artist => {
            let i = this.filteredArtists.findIndex(curr => this.getIdentifier(curr) === this.getIdentifier(artist));
            let k = this.aggregator.artists.findIndex(curr => this.getIdentifier(curr) === this.getIdentifier(artist));
            artist = this.setIdentifier(artist);
            this.filteredArtists[i] = artist;
            this.aggregator.artists[k] = artist;
        });
    }

    /**
     * Check if given artist is currently selected.
     */
    public isArtistSelected(artist: string) {
        return this.selectedArtists.indexOf(artist) > -1;
    }

    /**
     * Selected or deselect specified album.
     */
    public toggleSelectedArtist(artist: string) {
        let index = this.selectedArtists.indexOf(artist);

        if (index > -1) {
            this.selectedArtists.splice(index, 1);
        } else {
            this.selectedArtists.push(artist);
        }
    }

    /**
     * Select or de-select all tracks.
     */
    public toggleAllSelectedArtists() {
        if (this.allArtistsSelected) {
            this.selectedArtists = [];
        } else {
            this.selectedArtists = this.filteredArtists.map(artist => this.getIdentifier(artist));
        }

        this.allArtistsSelected = !this.allArtistsSelected;
    }

    /**
     * Deselect all currently selected items.
     */
    public deselectAllItems() {
        this.selectedArtists = [];
        this.allArtistsSelected = false;
    }

    // /**
    //  * Get available album image url or default one.
    //  */
    // public getAlbumImage(album: Album): string {
    //     if (album.image) return album.image;
    //     return this.settings.getBaseUrl() + 'assets/images/default/album.png';
    // }

    /**
     * If album is not created in backend yet, assign an identifier
     * by which album can by found in albums array for editing.
     */
    public setIdentifier(artist: Artist): Artist {
        if ( ! artist.id) artist.temp_id = utils.randomString();
        return artist;
    }

    /**
     * Get album identifier.
     */
    public getIdentifier(artist: Artist) {
        return artist.id || artist.temp_id;
    }

    /**
     * Bind album list search form control.
     */
    private bindSearchQuery() {
        this.searchQuery.valueChanges
            .debounceTime(150)
            .distinctUntilChanged()
            .subscribe(query => {
                let artists = this.aggregator.artists.slice();
                this.filteredArtists = artists.filter(artist => {
                    return utils.strContains(artist.name, query);
                });
            });
    }
}
