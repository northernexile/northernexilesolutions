
import {ApiError, Project} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import ProjectService from "../services/projectService";
import projectSlice from "../slices/projectSlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const projectActions = projectSlice.actions

export const addProject = (project:Project):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Project|ApiError = await ProjectService.add(project)

        if(!isApiError(response,201)) {
            toast.success('Project added.')
            dispatch(projectActions.setProject(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewProject = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Project|ApiError = await ProjectService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Project loaded')
        dispatch(projectActions.setProject(response))
    }
}

export const updateProject = (project:Project):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Project|ApiError = await ProjectService.update(project)
        if(!isApiError(response,200)) {
            toast.success('Updated project')
            dispatch(projectActions.setProject(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteProject = (project:Project):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await ProjectService.delete(project)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllProjectsForExperience = (experienceId):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Project[]|ApiError = await ProjectService.getAllByExperienceId(experienceId)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded projects')
        dispatch(projectActions.setProjects(response))
    }
}
