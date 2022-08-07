#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}

int Case;
void solve()
{
    int arr[5];
    int sum = 0;
    for(int i = 0; i < 5; i++)
    {
        cin >> arr[i];
        sum += arr[i];
    }
    sort(arr,arr+5);
    cout << sum-arr[4] << " " << sum-arr[0] << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)
    solve();
    //bruteforce();
}