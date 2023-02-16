
import {Address} from "./types";

interface InitialState {
    address:Address,
    addresses:Address[]
}

const SetAddressAction = 'Address'

export default InitialState
export {SetAddressAction}
