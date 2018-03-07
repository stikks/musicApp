import {Injectable} from '@angular/core';
import {Resolve, RouterStateSnapshot, ActivatedRouteSnapshot, Router} from '@angular/router';
import {Aggregator} from "../../../shared/types/models/Aggregator";
import {Aggregators} from "../aggregators.service";

@Injectable()
export class EditAggregatorPageResolver implements Resolve<Aggregator> {

    constructor(
        private aggregators: Aggregators,
        private router: Router
    ) {}

    resolve(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): Promise<Aggregator> {
        const params = {simplified: true},
            id = +route.paramMap.get('id');

        return this.aggregators.get(id, params).toPromise().then((aggregator: any) => {
            if (aggregator) {
                return aggregator;
            } else {
                this.router.navigate(['/admin/aggregators']);
                return false;
            }
        }).catch(() => {
            this.router.navigate(['/admin/aggregators']);
        }) as any;
    }
}