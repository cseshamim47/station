#include <bits/stdc++.h>
using namespace std;

#define ll long long

bool f(vector<ll> &v,ll add, ll k)
{
    add += v[0];
    for(int i = 1; i < v.size(); i++)
    {
        if(v[i]*100 > (add*k)) return false;
        add += v[i];
    }
    return true;
}

int main()
{
    int t;
    cin >> t;
    while(t--)
    {
        ll n,k;
        cin >> n >> k;
        vector<ll> v(n);
        for(int i = 0; i < n; i++)
        {
            cin >> v[i];
        }

        ll l = 0, r = 1e12;

        while(l < r)
        {
            ll mid = l + (r-l)/2;

            if(f(v,mid,k))
            {
                 r = mid;
            }else
            {
                l = mid+1;
            }
        }

        cout << r << endl;





    }
}
