#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
int ans = 0;
string larger,str;
void printSubArrays(string arr, int start, int end)
{     
    // Stop if we have reached the end of the array    
    if (end == arr.size())
        return;
       
    // Increment the end point and start from 0
    else if (start > end)
        printSubArrays(arr, 0, end + 1);
           
    // Print the subarray and increment the starting point
    else
    {
        string tmp = "";
        for (int i = start; i <= end; i++){
            // cout << arr[i];
            tmp.push_back(arr[i]);
        }
        int x = larger.find(tmp);
        if(x != string::npos)
        {
            int sm = str.size()-tmp.size();
            int lg = larger.size()-tmp.size();
            ans = min(ans,sm+lg);
        }
        printSubArrays(arr, start + 1, end);
    }

}

void solve()
{
   cin >> str >> larger;
   if(str.length() > larger.length()) swap(str,larger);
   ans = INT_MAX;
   printSubArrays(str, 0, 0);
   if(ans == INT_MAX) ans = larger.size()+str.size();
   cout << ans << endl;
   str = "";
   larger = "";
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
}