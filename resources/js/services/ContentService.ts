
import http from "../http-common";
import IContentData from "../types/content";

const getAll = () => {
    return http.get<Array<IContentData>>("/content");
};

const get = (id: any) => {
    return http.get<IContentData>(`/content/${id}`);
};

const create = (data: IContentData) => {
    return http.post<IContentData>("/content", data);
};

const update = (id: any, data: IContentData) => {
    return http.put<any>(`/content/${id}`, data);
};

const remove = (id: any) => {
    return http.delete<any>(`/content/${id}`);
};

const removeAll = () => {
    return http.delete<any>(`/content`);
};

const ContentService = {
    getAll,
    get,
    create,
    update,
    remove,
    removeAll
};

export default ContentService;
