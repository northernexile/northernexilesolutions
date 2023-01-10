
import {Content} from "./types";

interface InitialState  {
    content:Content[],
    active:Content
}

const SetContentAction = 'Content'

export default InitialState
export {SetContentAction}
