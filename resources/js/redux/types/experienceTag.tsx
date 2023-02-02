import {ExperienceTag} from "./types";
interface InitialState  {
    experienceTags:ExperienceTag[],
    experienceTag:ExperienceTag
}

const SetExperienceTagAction = 'ExperienceTag'

export default InitialState
export {SetExperienceTagAction}
