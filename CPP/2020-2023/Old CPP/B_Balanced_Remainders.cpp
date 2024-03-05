#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{


// 0->1 = 1
// 1->2 = 1
// 2->0 = 1
    int n;
    cin >> n;
    int arr[n];
    int zero = 0, one = 0, two = 0;
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];
        if(arr[i]%3 == 0) zero++;
        else if(arr[i]%3 == 1) one++;
        else two++;
    }
    int each = n/3;
    int cnt = 0;
    while(true)
    {
        if(zero > one) cnt++,zero--,one++;
        else if(one > two) cnt++,one--,two++;
        else if(two > zero) cnt++,two--,zero++;
        
        if(zero == one && one == two) break;
    }
    cout << cnt << endl;

}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}