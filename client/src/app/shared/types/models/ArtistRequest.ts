/**
 * Created by tm30user on 27/02/2018.
 */
export class ArtistRequest {
    address: string;
    phone: string;
    twitter_id: string;
    facebook_id: string;
    stage_name: string;
    instagram_id: string;

    constructor(params: Object = {}) {
        for (let name in params) {
            this[name] = params[name];
        }
    }
}