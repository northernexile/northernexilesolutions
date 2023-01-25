
import {ApiError} from "./types";

interface InitialState {
    error:ApiError
}

const SetErrorAction = 'error'

export default InitialState;
export {SetErrorAction}
