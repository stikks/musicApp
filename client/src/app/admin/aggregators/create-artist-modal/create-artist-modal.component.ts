import {Component, ElementRef, Renderer2, ViewEncapsulation} from '@angular/core';
import {BaseModalClass} from "../../../shared/modal/base-modal";
import {Artist} from "../../../shared/types/models/Artist";
import {Artists} from "../../../web-player/artists/artists.service";

import {ArtistRequest} from "../../../shared/types/models/ArtistRequest";
import {Settings} from "../../../shared/settings.service";
import {ModalService} from "../../../shared/modal/modal.service";
import {UploadFileModalComponent} from "../../../shared/upload-file-modal/upload-file-modal.component";
import {Observable} from "rxjs/Observable";

import {ArtistRequests} from "../../../web-player/artists/artist-requests.service";

import { Cookie } from 'ng2-cookies/ng2-cookies';

@Component({
    selector: 'create-artist-modal',
    templateUrl: './create-artist-modal.component.html',
    styleUrls: ['./create-artist-modal.component.scss'],
    encapsulation: ViewEncapsulation.None
})
export class CreateRequestModalComponent extends BaseModalClass {

    /**
     * New artist request.
     */
    public model = new Artist({});

    public model_object = new ArtistRequest({});

    /**
     * NewArtistModal Component.
     */
    constructor(
        protected el: ElementRef,
        protected renderer: Renderer2,
        private artists: Artists,
        private settings: Settings,
        private modal: ModalService,
        private requests: ArtistRequests
    ) {
        super(el, renderer);
    }

    /**
     * Show the modal.
     */
    public show(params: {artist?: Artist}) {
        if (params.artist) this.model = Object.assign({}, params.artist);
        // this.setDefaultImageUrl();
        super.show(params);
    }

    /**
     * Close modal and emit created artist.
     */
    public confirm() {
        this.loading = true;
        this.createArtist().finally(() => {
            this.loading = false;
        }).subscribe(artist => {
            super.done(artist);
        }, this.handleErrors.bind(this));
    }

    /**
     * Create new artist or update existing one.
     */
    private createArtist(): Observable<ArtistRequest> {
        const payload = {
            address: this.model_object.address,
            phone: this.model_object.phone,
            twitter_id: this.model_object.twitter_id,
            facebook_id: this.model_object.facebook_id,
            stage_name: this.model_object.stage_name,
            instagram_id: this.model_object.instagram_id
        };
        return this.requests.create(payload);
    }

    /**
     * Open modal for uploading artist image.
     */
    public openImageUploadModal() {
        const params = {uri: 'images/static/upload', httpParams: {type: 'artist'}};
        this.modal.show(UploadFileModalComponent, params).onDone.subscribe(url => {
            // this.model.image = url;
        });
    }

    /**
     * Set default image on model, if it does not already exist.
     */
    // private setDefaultImageUrl() {
    //     if (this.model.image) return;
    //     this.model.image = this.settings.getBaseUrl() + 'assets/images/default/artist_small.jpg';
    // }
}
