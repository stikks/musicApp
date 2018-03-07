import {Injectable} from '@angular/core';
import {Artists} from "./artists.service";
import {MediaItem} from "../media-item.service";
import {Artist} from "../../shared/types/models/Artist";

import {Aggregator} from "../../shared/types/models/Aggregator";
import {Aggregators} from "./aggregators.service";

@Injectable()
export class AggregatorService extends MediaItem<Aggregator> {

    /**
     * Top artist tracks.
     */
    // private topTracks: Track[] = [];

    /**
     * ArtistService Constructor.
     */
    constructor(protected aggregators: Aggregators) {
    }

    // /**
    //  * Get artist top tracks.
    //  */
    // public getTopTracks(count = 5) {
    //     return this.topTracks.slice(0, count);
    // }

    /**
     * Get similar artists.
     */
    public getSimilar(count: number = 20) {
        if ( ! this.item.similar) return [];
        return this.item.similar.slice(0, count);
    }

    /**
     * Check if artist has any similar artists.
     */
    public hasSimilar() {
        return this.item.similar.length;
    }

    /**
     * Get loaded albums of artist.
     */
    public getAlbums() {
        return this.paginatedData;
    }

    /**
     * Get artist biography and images.
     */
    public getBio(): { images: { url: string }[], bio: string } {
        return this.item.bio as any;
    }

    /**
     * Destroy artist service.
     */
    public destroy() {
        // this.topTracks = [];
        super.destroy();
    }

    /**
     * Load next infinite load albums page.
     */
    protected loadNextPage() {
        return this.artists.paginateAggregatorArtists(this.item.id, this.pagination.current_page + 1).map(response => {
            response.data = this.addAggregatorToArtists(response.data);
            return response;
        });
    }

    // /**
    //  * Get tracks from specified albums.
    //  */
    // public getTracks(paginatedData?: any[]): Track[] {
    //     let data = (paginatedData ? paginatedData : this.paginatedData), tracks = [];
    //
    //     data.forEach(album => {
    //         tracks = tracks.concat(WpUtils.assignAlbumToTracks(album.tracks, album));
    //     });
    //
    //     //if paginated tracks were not specified, it means initial
    //     //data is being requested, so we should prepend top tracks to it
    //     if ( ! paginatedData) {
    //         tracks = this.topTracks.concat(tracks);
    //     }
    //
    //     return tracks;
    // }

    /**
     * Load artist from backend.
     */
    protected async loadItem(id: number, params = {}) {
        const response = await this.aggregators.get(id, params).toPromise();
        response.artists.data = this.addAggregatorToArtists(response.artists.data, response.aggregator);
        this.setItem(response.aggregator, response.artists);
        // this.topTracks = response.top_tracks || [];
    }

    /**
     * Add simplified artist object to all albums, for generating urls and context menus.
     */
    private addAggregatorToArtists(artists: Artist[], aggregator?: Aggregator) {
        if ( ! aggregator) aggregator = this.item;

        return artists.map(artist => {
            artist.aggregator = {name: aggregator.name, id: aggregator.id} as Aggregator;
            return artist;
        });
    }
}
