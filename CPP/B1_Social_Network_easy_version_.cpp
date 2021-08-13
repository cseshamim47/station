//Author : Md Shamim Ahmed (20-44242-3)      American International University Bangladesh
#include <bits/stdc++.h>
using namespace std;
#define eps 1e-12
#define MAX 10000005
#define ll long long
#define w(t) while(t--){ solve(); }
ll cnt;

void solve()
{
    int n, k;
    cin >> n >> k;
    unordered_map<int,int> mp;
    vector<int> v;
    int p = 0;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        
        if(mp[x] == 0)
        {

            mp[x] = 1;
            v.push_back(x);
            if(mp.size() == k+1) 
            {
                mp.erase(v[p]);
                p++;
            }
        }
            
    }
    int s = mp.size();
    int small = min(s,k);
    cout << small << "\n";
    int cnt = 0;
    for(int i = v.size()-1; i >= 0; i--)
    {
        cnt++;
        cout << v[i] << " ";
        if(cnt == small) break;
    }

}

int main()
{
      //        Bismillah
    // int t;   cin >> t;   w(t);
    solve();
}