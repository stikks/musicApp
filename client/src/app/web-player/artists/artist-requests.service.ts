/**
 * Created by tm30user on 27/02/2018.
 */
import {Injectable} from '@angular/core';
import {AppHttpClient} from "../../shared/app-http-client.service";
import {Observable} from "rxjs/Observable";
import {ArtistRequest} from "../../shared/types/models/ArtistRequest";

import * as $ from "jquery";

@Injectable()
export class ArtistRequests {

  /**
   * Artists Service Constructor.
   */
  constructor(private httpClient: AppHttpClient) {}

  /**
   * Get artist matching specified id.
   */
  public get(id: number, params = {}): Observable<{artist_request: ArtistRequest}> {
    return this.httpClient.get('artist_requests/' + id, params);
  }

  /**
   * Create new request.
   */

  public create(payload: object): Observable<ArtistRequest> {
    // let response = $.post('/secure/artist_requests', payload, function (resp, body) {
    //     console.log(resp);
    //     console.log(body);
    //     return resp;
    // });
    return this.httpClient.post('artist_requests', payload);
  }
}
