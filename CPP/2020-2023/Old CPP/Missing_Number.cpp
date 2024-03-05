#include <bits/stdc++.h>
using namespace std;

#define int long long

int32_t main()
{
    //    Bismillah
    int n;
    cin >> n;
    map<int,int> mp;
    for(int i = 0; i < n-1; i++)
    {
        int x;
        cin >> x;
        mp[x]++;
    }
    
    for(int i = 1; i <= n; i++) 
    {
        if(mp[i] == 0)
        {
            cout << i << endl;
            return 0;
        }
    }


}