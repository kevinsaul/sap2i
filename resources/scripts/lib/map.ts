import * as L from "leaflet";
import { Point } from "../interfaces/Point";

export class Map {
    private id: string;
    private map: L.map;
    private center: Point;
    private zoom: number = 13;
    private leafIcon: L.Icon;
    private markers: Array<Point> = [];
    private layerGroup: L.layerGroup;

    constructor(id: string, center: Point) {
        this.id = id;
        this.center = center;

        //Create a map
        this.map = L.map(this.id).setView(
            [this.center.lat, this.center.lng],
            this.zoom
        );
        this.layerGroup = L.layerGroup().addTo(this.map);
    }

    /**
     * load the map
     */
    load(): Map {
        //If map not exist stop the script
        if (document.getElementById(this.id) == null) {
            return this;
        }

        //Define the tiles use on map
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.map);

        this.loadMarkers();

        return this;
    }

    /**
     * load Markers
     */
    loadMarkers(): any {
        this.layerGroup.clearLayers();

        if (this.markers.length > 0) {
            for (let i = 0; i < this.markers.length; i++) {
                this.addMarkersMap(this.markers[i]);
            }
        }

        return this;
    }

    /**
     * Add a new marker map
     */
    addMarkersMap(marker: Point): Map {
        let markerIcon = this.leafIcon;
        if (marker.icon != undefined) {
            markerIcon = this.createIcon(marker.icon.iconUrl, marker.icon);
            delete marker.icon;
        }
        let markerMap = L.marker([marker.lat, marker.lng], {
            ...{ icon: markerIcon },
            ...marker
        });

        if (marker.content != undefined) {
            markerMap.bindPopup(marker.content);
        }

        // Deal event and call function define in the marker
        if (marker.click != undefined) {
            markerMap.on("click", (e: Event) => this[marker.click](e));
        }

        markerMap.addTo(this.layerGroup);

        return this;
    }

    /**
     * Rewrite the marker to add icon and iconSize
     * @param allMarkers : any
     */
    rewriteMarkers(allMarkers: any): any {
        return allMarkers.map(map => {
            let markers: any = {
                id: map.id,
                lat: map.latitude,
                lng: map.longitude,
                click: "markerClick",
                icon: {
                    iconUrl: map.icon,
                    iconSize: map.iconSize,
                    iconAnchor: map.iconAnchor
                }
            };

            return markers;
        });
    }

    /**
     * Set all icon url for marker
     */
    setIcon(icon: string, options?: Object): Map {
        if (options == undefined) {
            options = {};
        }

        this.leafIcon = this.createIcon(icon, options);

        return this;
    }

    /**
     * Get the zoom map
     */
    getZoom(): number {
        return this.zoom;
    }

    /**
     * Define the zoom map
     */
    setZoom(zoom: number): Map {
        this.zoom = zoom;
        this.map.setZoom(zoom);

        return this;
    }

    /**
     * Get all markers map
     */
    getMarkers(): Array<Point> {
        return this.markers;
    }

    /**
     * Define all markers map
     */
    setMarkers(markers: Array<Point>) {
        this.markers = markers;

        return this;
    }

    /**
     * Create icon object
     */
    protected createIcon(icon: any, options?: Object) {
        let iconOptions = {
            iconUrl: icon,
            iconSize: [32, 32],
            iconAnchor: [16, 16]
        };

        if (options != undefined) {
            iconOptions = { ...iconOptions, ...options };
        }

        return L.icon(iconOptions);
    }
}
