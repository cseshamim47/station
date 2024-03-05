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
    int sum = 0;
    int m = 0, p = 0;
    for(int i = 0; i < n; i++)
    {   
        cin >> arr[i];
        sum += arr[i];
        if(arr[i] < 0) m+=arr[i];
        else p+=arr[i];
    }
    if(!sum)
    {
        cout << "NO" << endl;
        return;
    }
    if(p>abs(m))
    sort(arr,arr+n,greater<int>());
    else 
    sort(arr,arr+n);
    cout << "YES" << endl;
    for(int x : arr) cout << x << " "; 
    printf("\n");
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}