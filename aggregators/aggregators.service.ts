import {Injectable} from '@angular/core';
import {AppHttpClient} from "../../shared/app-http-client.service";
import {Observable} from "rxjs/Observable";
import {Aggregator} from "../../shared/types/models/aggregator";
import {PaginationResponse} from "../../shared/types/pagination-response";

import {Artist} from "../../shared/types/models/artist";

@Injectable()
export class Aggregators {

    /**
     * aggregators Service Constructor.
     */
    constructor(private httpClient: AppHttpClient) {}

    /**
     * Get aggregator matching specified id.
     */
    public get(id: number, params = {}): Observable<{aggregator: Aggregator, artists: PaginationResponse<Artist>}> {
        return this.httpClient.get('aggregators/' + id, params);
    }

    /**
     * Create a new aggregator.
     */
    public create(payload: object): Observable<Aggregator> {
        return this.httpClient.post('aggregators', payload);
    }

    /**
     * Update existing aggregator.
     */
    public update(id: number, payload: object): Observable<Aggregator> {
        return this.httpClient.put('aggregators/'+id, payload);
    }

    /**
     * Paginate specified aggregator artists.
     */
    public paginateaggregatorArtists(id: number, page = 1): Observable<PaginationResponse<Artist>> {
        return this.httpClient.get('aggregators/'+id+'/artists', {page});
    }

    /**
     * Get radio recommendations for specified aggregator.
     */
    public getRadioRecommendations(id: number) {
        return this.httpClient.get(`radio/aggregator/${id}`);
    }

    /**
     * Delete specified aggregators.
     */
    public delete(ids: number[]) {
        return this.httpClient.delete('aggregators', {ids});
    }
}
