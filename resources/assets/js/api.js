import request from 'superagent';

export const getFavTags = (q) => {
    return request.get('/api/candidacy_tags/').query({ q: 1 })

}

export const getTags = (q) => {
    return request.get('/api/candidacy_tags/').query({ q: q })
}