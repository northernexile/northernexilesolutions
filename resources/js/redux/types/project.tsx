
import {Project} from "./types";

interface InitialState {
    project:Project,
    projects:Project[]
}

const SetProjectAction = 'Project'

export default InitialState
export {SetProjectAction}
