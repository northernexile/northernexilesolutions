
import {ApiError, Tag} from "../types/types";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {AnyAction} from "redux";
import TagService from "../services/tagService";
import TagSlice from "../slices/tagSlice";
import isApiError from "../../snippets/isApiError";
import {toast} from "react-toastify";

export const tagActions = TagSlice.actions

export const addTag = (tag:Tag):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async(dispatch,getState) :Promise<void>=>{
        const response:Tag|ApiError = await TagService.add(tag)

        if(!isApiError(response,201)) {
            toast.success('Tag added.')
            dispatch(tagActions.setTag(response))
        } else {
            toast.error(response.message)
        }
    }
}

export const viewTag = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Tag|ApiError = await TagService.getById(id)

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Tag loaded')
        dispatch(tagActions.setTag(response))
    }
}

export const updateTag = (tag:Tag):ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Tag|ApiError = await TagService.update(tag)
        if(!isApiError(response,200)) {
            toast.success('Updated tag')
            dispatch(tagActions.setTag(response))
        } else{
            toast.error(response.message)
        }
    }
}

export const deleteTag = (tag:Tag):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async (dispatch,getState) :Promise<void>=>{
        const response:boolean|ApiError = await TagService.delete(tag)

        if(isApiError(response,200)){
            toast.error(response.message)
            return
        }

        toast.success('Item deleted')
    }
}

export const getAllTag = ():ThunkAction<void, RootState, unknown, AnyAction>=> {
    return async (dispatch,getState) :Promise<void>=>{
        const response:Tag[]|ApiError = await TagService.getAll()

        if(isApiError(response,200)) {
            toast.error(response.message)
            return
        }

        toast.success('Loaded tag')
        dispatch(tagActions.setTags(response))
    }
}
