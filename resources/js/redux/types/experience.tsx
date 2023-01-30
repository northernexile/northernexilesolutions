
import {Contact, Experience} from "./types";

interface InitialState {
    experience:Experience,
    history:Experience[]
}

const SetExperienceAction = 'Experience'

export default InitialState
export {SetExperienceAction}
