
import InitialState,{SetProjectAction} from "../types/project";
import {createSlice,PayloadAction} from "@reduxjs/toolkit";
import {Project} from "../types/types";

const initialState: InitialState = {
    project:{
        id:null,
        experienceId:null,
        description:null,
    },
    projects:[]
}

export const projectSlice = createSlice({
    name: SetProjectAction,
    initialState: initialState,
    reducers: {
        setProject: (state,action: PayloadAction<Project>) => {
            state.project = action.payload
        },
        setProjects: (state,action:PayloadAction<Array<Project>>) => {
            state.projects = action.payload
        },
    }
});

const selectProject = (state) => state.projects.project

export default projectSlice
export {selectProject}
