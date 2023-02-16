
import {Client} from "./types";

interface InitialState {
    client:Client,
    clients:Client[]
}

const SetClientAction = 'Client'

export default InitialState
export {SetClientAction}
