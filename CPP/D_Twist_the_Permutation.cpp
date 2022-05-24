#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void rotate(int* arr, int n, int d)
{
    d%=n;
    reverse(arr,arr+d);
    reverse(arr+d,arr+n);
    reverse(arr,arr+n);
}

void solve()
{
    int n;
    cin >> n;
    int arr[n];

    for(int i = 0; i < n; i++) cin >> arr[i];
    
    vector<int> ans;
    for(int i = n-1; i >= 0; i--)
    {
        int j = 0;
        bool f = false;
        for(j; j < i; j++)
        {
            if(arr[j] == i+1)
            {
                f = true;
                break;
            }
        }
        
        if(f)
        rotate(arr,i+1,j+1);
        else j = -1;
        ans.push_back(j+1);
    }
    reverse(ans.begin(),ans.end());
    for(auto x : ans) cout << x << " ";
    cout << endl;
}


int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}