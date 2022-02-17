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
    int maxOdd = INT_MIN;
    int oddIdx = -10;
    int evenIdx = -10;
    int maxEven = INT_MIN;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        // if(arr[i]%2 == 0)
        // {
        //     maxEven = max(maxEven,arr[i]);
        //     evenIdx = i;
        // }else 
        // {
        //     maxOdd = max(maxOdd,arr[i]);
        //     oddIdx = i;
        // }
    }
    bool notPossible = false;
    for(int i = 0; i < n; i++)
    {
        if(arr[i]%2 == 0 && arr[i] >= maxEven)
        {
            maxEven = arr[i];
            continue;
        }else if(arr[i]%2 != 0 && arr[i] >= maxOdd)
        {
            maxOdd= arr[i];
            continue;
        }else
        {
            notPossible = true;
        }
    }
    
    
    if(notPossible) cout << "No" << endl;
    else cout << "Yes" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}