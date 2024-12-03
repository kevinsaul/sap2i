import global from "../global.js";
import axios from "axios";

export class Query {
    send(type: string, data: any) {
        return axios[type](global.adminAjax, this.jsonToURI(data), {
            headers: {
                "Content-Type":
                    "application/x-www-form-urlencoded; charset=UTF-8"
            }
        });
    }

    jsonToURI(json: any) {
        return new URLSearchParams(json);
    }
}
