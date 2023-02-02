
import {TechnologyType} from "./types";
interface InitialState  {
    technologyTypes:TechnologyType[],
    technologyType:TechnologyType
}

const SetTechnologyTypeAction = 'TechnologyType'

export default InitialState
export {SetTechnologyTypeAction}
