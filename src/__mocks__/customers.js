import { v4 as uuid } from 'uuid';

export const customers = [
  {
    id: uuid(),
    address: {
      country: '',
      state: '',
      city: '1',
      street: '2849 Fulton Street'
    },
    avatarUrl: '/static/images/products/a.png',
    createdAt: 1555016400000,
    email: 'la poste el ghazela',
    name: 'skander nafti',
    phone: '50352034'
  },
  {
    id: uuid(),
    address: {
      country: '',
      state: '',
      city: '2',
      street: '1865  Pleasant Hill Road'
    },
    avatarUrl: '/static/images/products/a.png',
    createdAt: 1555016400000,
    email: 'la poste el ghazela',
    name: 'amir ben amer',
    phone: '50352034'
  },
  {
    id: uuid(),
    address: {
      country: '',
      state: '',
      city: '3',
      street: '4894  Lakeland Park Drive'
    },
    avatarUrl: '/static/images/products/a.png',
    createdAt: 1555016400000,
    email: 'la poste el ghazela',
    name: 'walid jaouani',
    phone: '50352034'
  },
  ];
