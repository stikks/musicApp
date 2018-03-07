import {Component, ElementRef, Renderer2, ViewEncapsulation} from '@angular/core';
import {BaseModalClass} from "../../../shared/modal/base-modal";
import {ArtistRequest} from "../../../shared/types/models/ArtistRequest";
import {ArtistRequests} from "../artist-requests.service";
import {Settings} from "../../../shared/settings.service";
import {ModalService} from "../../../shared/modal/modal.service";
import {UploadFileModalComponent} from "../../../shared/upload-file-modal/upload-file-modal.component";
import {Observable} from "rxjs/Observable";

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
    public model = new ArtistRequest({});

    /**
     * NewArtistModal Component.
     */
    constructor(
        protected el: ElementRef,
        protected renderer: Renderer2,
        private requests: ArtistRequests,
        private settings: Settings,
        private modal: ModalService,
    ) {
        super(el, renderer);
    }

    /**
     * Show the modal.
     */
    public show(params: {artist_request?: ArtistRequest}) {
        if (params.artist_request) this.model = Object.assign({}, params.artist_request);
        // this.setDefaultImageUrl();
        super.show(params);
    }

    /**
     * Close modal and emit created artist.
     */
    public confirm() {
        this.loading = true;
        this.createArtistRequest().finally(() => {
            this.loading = false;
        }).subscribe(artist_request => {
            Cookie.set('__xhRequest__', "true");
            super.done(artist_request);
        }, this.handleErrors.bind(this));
    }

    /**
     * Create new artist or update existing one.
     */
    private createArtistRequest(): Observable<ArtistRequest> {
        const payload = {
            address: this.model.address,
            phone: this.model.phone,
            twitter_id: this.model.twitter_id,
            facebook_id: this.model.facebook_id,
            stage_name: this.model.stage_name,
            instagram_id: this.model.instagram_id
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
