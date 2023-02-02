import {ExperienceTechnology} from "./types";
interface InitialState  {
    experienceTechnologies:ExperienceTechnology[],
    experienceTechnology:ExperienceTechnology
}

const SetExperienceTechnologyAction = 'ExperienceTechnology'

export default InitialState
export {SetExperienceTechnologyAction}
