
import http from "../http-common";
import ISkillData from "../types/skill";

const getAll = () => {
    return http.get<Array<ISkillData>>("/skills");
};

const get = (id: any) => {
    return http.get<ISkillData>(`/skills/${id}`);
};

const create = (data: ISkillData) => {
    return http.post<ISkillData>("/skills", data);
};

const update = (id: any, data: ISkillData) => {
    return http.put<any>(`/skills/${id}`, data);
};

const remove = (id: any) => {
    return http.delete<any>(`/skills/${id}`);
};

const removeAll = () => {
    return http.delete<any>(`/skills`);
};

const SkillService = {
    getAll,
    get,
    create,
    update,
    remove,
    removeAll
};

export default SkillService;
