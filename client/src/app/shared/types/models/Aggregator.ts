/**
 * Created by tm30user on 07/03/2018.
 */
import {Artist} from "./Artist";

export class Aggregator {
    id: number;
    name: string;
    address?: string;
    bio?: string;
    cac_number?: string;
    artists?: Artist[];
    user_info_id: number;
    created_at?: string;
    updated_at?: string;

    constructor(params: Object = {}) {
        for (let name in params) {
            this[name] = params[name];
        }
    }
}