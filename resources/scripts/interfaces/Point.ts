export interface Point {
    id?: number;
    lat: number;
    lng: number;
    icon?: Icon;
    content?: string;
    click?: string;
}

interface Icon {
    iconUrl: string;
    iconSize: Array<number>;
    iconAnchor: Array<number>;
}
