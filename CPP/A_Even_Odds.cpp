#include <bits/stdc++.h>
using namespace std;

int main()
{
    long long int n,k;
    cin >> n >> k;
    long long int loop = 0;
    if(n%2 == 0) loop = n/2;
    else loop = n/2 + 1;

    if(loop >= k){
        // cout << loop << endl;
        long long int cnt = 1;
        for(long long int i = 1; ;i+=2){
            if(cnt == k) {
                cout << i << "\n";
                break;
            }
            // cout << i << endl;
            cnt++;
        }
    }else{
        long long int cnt = 1;
        k -= loop;
        for(long long int i = 2; ;i+=2){
            if(cnt == k) {
                cout << i << "\n";
                break;
            }
            // cout << i << endl;
            cnt++;
        }
    }
}