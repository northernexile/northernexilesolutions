
import {Contact} from "./types";

interface InitialState {
    contact:Contact,
    contacts:Contact[]
}

const SetContactAction = 'Contact'

export default InitialState
export {SetContactAction}
