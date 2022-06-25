#include <bits/stdc++.h>
using namespace std;

#define all(x) x.begin(),x.end()


void solve()
{
    int n;
    cin >> n;
    vector<int> v;
    vector<int> vc;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        v.push_back(x);
        vc.push_back(x);
    }

    sort(all(vc),greater<int>());

    vector<pair<pair<int,int>,int>> ans;
    for(int i = 0; i < n; i++)
    {
        for(int j = 0; j < n-i; j++)
        {
            if(v[j]==vc[i] && j+1 != n-i)
            {
                reverse(v.begin()+j+1,v.begin()+n-i);
                reverse(v.begin()+j,v.begin()+n-i);
                ans.push_back({{j+1,n-i},1});
                break;
            }
        }
        // for(auto x : v) cout << x << " ";
        // cout << endl;
    }

    cout << ans.size() << endl;
    for(auto x : ans)
    {
        cout << x.first.first << " " << x.first.second << " " << x.second << endl;

    }


}


int main()
{
    int t;
    cin >> t;

    while(t--)
    {
        solve();
    }
}