
import {Sector} from "./types";

interface InitialState  {
    sectors:Sector[],
    active:Sector
}

const SetSectorAction = 'Sector'

export default InitialState
export {SetSectorAction}
