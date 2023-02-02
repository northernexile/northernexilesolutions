import {ExperienceSector} from "./types";
interface InitialState  {
    experienceSectors:ExperienceSector[],
    experienceSector:ExperienceSector
}

const SetExperienceSectorAction = 'ExperienceSector'

export default InitialState
export {SetExperienceSectorAction}
