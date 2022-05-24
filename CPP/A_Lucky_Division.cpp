// 4 7 44 77 47 74 477 447 444 474 744 777 747 774 
// 447 -> 447,474,744
// 774 -> 774,747,477

#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
void solve()
{
    int arr[14] = {4,7,44,77,47,74,477,447,444,474,744,777,747,774};
    int n;
    cin >> n;
    for(int i = 0; i < 14; i++)
    {
        if(n%arr[i] == 0)
        {
            cout << "YES" << endl;
            return;
        }
    }
    cout << "NO" << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    // w(t)

    solve();
}