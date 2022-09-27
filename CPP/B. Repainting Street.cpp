#include <bits/stdc++.h>
using namespace std;



int main()
{
    ios_base::sync_with_stdio();
    cin.tie(NULL);

    int q;
    cin >> q;
    while(q--)
    {
        int n,k;
        cin >> n >> k;
        vector<int> v(n);
        map<int,int> mp;
        int mx = -1;
        int prevMx = -1;
        for(int i = 0; i < n; i++)
        {
            cin >> v[i];
            mp[v[i]]++;
        }
        int ans = INT_MAX;

        for(auto x : mp)
        {
            mx = x.first;
            int cnt = 0;
            for(int i = 0; i < n; i++)
            {
                if(v[i] != mx)
                {
                    cnt++;
                    i += (k-1);
                }
            }
            ans = min(ans,cnt);
        }


        cout << ans << endl;



    }

}
