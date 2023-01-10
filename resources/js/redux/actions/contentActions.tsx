
import contentSlice from "../slices/contentSlice";
import {AnyAction} from "redux";
import {ThunkAction} from "@reduxjs/toolkit";
import {RootState} from "../index";
import {Content} from "../types/types"
import ContentService from "../services/contentService";

export const ContentActions = contentSlice.actions

export const getAllContent = ():ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        if(getState().content.content.length == 0){
            const response:Content[] = await ContentService.getAll()
            dispatch(ContentActions.setContent(response))
        }
    }
}

export const getContent = (id:any):ThunkAction<void, RootState, unknown, AnyAction>=>{
    return async(dispatch,getState) :Promise<void>=>{
        const response:Content = await ContentService.getById(id)
        dispatch(ContentActions.setActiveContent(response))
    }
}
