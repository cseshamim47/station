#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    map<int,int> mp;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        mp[arr[i]]++;
    }

    map<int,int>::iterator it;
    int cnt = 0;
    for(it = mp.begin(); it != mp.end(); it++)
    {
        // cout << it->first << " " << it->second << endl;
        int key = it->first;
        int val = it->second;
        if(key == 0) cnt++;
        else if(val >= 2 && key > 0)
        {
            cnt+=2;
            mp[-key] = 0;
        }else if(val >= 2 && key < 0)
        {
            cnt+=2;
            mp[abs(key)] = 0;
        }else if(val == 1)
        {
            cnt++;
            if(key > 0)
            {
                if(mp[-key] > 0)
                {
                    cnt++;
                    mp[-key] = 0;
                }
            }else 
            {
                if(mp[abs(key)] > 0)
                {
                    cnt++;
                    mp[abs(key)] = 0;
                }
            }
        }
    }
    cout << cnt << endl;
    // for(auto &it : mp) cout << it.first << " " << it.second << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}


// 1 -1 1 1 -1

// 1 -> 3
// -1 > 2

// 1 -1

