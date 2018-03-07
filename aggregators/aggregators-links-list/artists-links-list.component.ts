import {ChangeDetectionStrategy, Component, Input, ViewEncapsulation} from '@angular/core';
import {WebPlayerUrls} from "../../web-player-urls.service";

@Component({
    selector: 'aggregators-links-list',
    templateUrl: './aggregators-links-list.component.html',
    styleUrls: ['./aggregators-links-list.component.scss'],
    encapsulation: ViewEncapsulation.None,
    changeDetection: ChangeDetectionStrategy.OnPush
})
export class AggregatorsLinksListComponent {

    /**
     * aggregatorsLinksListComponent Constructor.
     */
    constructor(public urls: WebPlayerUrls) {}

    /**
     * List of artist names to render.
     */
    @Input() aggregators: string[];
}
