
import {ClientAddress} from "./types";

interface InitialState {
    clientAddress:ClientAddress,
    clientAddresses:ClientAddress[]
}

const SetClientAddressAction = 'ClientAddress'

export default InitialState
export {SetClientAddressAction}
