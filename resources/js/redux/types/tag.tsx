import {Tag} from "./types";
interface InitialState  {
    tags:Tag[],
    tag:Tag
}

const SetTagAction = 'Tag'

export default InitialState
export {SetTagAction}
