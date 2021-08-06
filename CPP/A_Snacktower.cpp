
#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    bool b[n+1] = {false};

    for(int i = 0; i < n; i++){
        cin >> arr[i];
    }
    int maxx = n;
    
    for(int i = 0; i < n; i++){
        b[arr[i]] = true;

        while(b[maxx]){
            cout << maxx-- << " ";
        }
        cout << "\n";
    }
    
}