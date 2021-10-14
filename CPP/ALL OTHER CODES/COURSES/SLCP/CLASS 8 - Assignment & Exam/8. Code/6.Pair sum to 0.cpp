#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int n;
    cin >> n;
    int arr[n];
    
    unordered_map<int,int> um;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        um[arr[i]]++;
    }
    
    int cnt = 0;
    
    unordered_map<int,int>::iterator it = um.begin();

    for(; it!=um.end(); it++)
    {
        int curKey = it->first;
        int curKeyVal = it->second;
        if(curKey != 0 && um.find(-curKey) != um.end()) cnt += abs(curKeyVal*um[-curKey]);   
    }


    if(um[0] > 1) cnt += (um[0]*(um[0]-1));
    cout << cnt/2 << endl;

}

int32_t main()
{
    w(t)
}

