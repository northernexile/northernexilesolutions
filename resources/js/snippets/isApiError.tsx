import {ApiError} from "../redux/types/types";

const isApiError = (toBeDetermined: any,code:any): toBeDetermined is ApiError => {
    return (toBeDetermined as ApiError).code && toBeDetermined.code !== code
}

export default isApiError;
