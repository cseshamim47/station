#include <bits/stdc++.h>
using namespace std;

typedef int ll;

bool goruKothakar(int arr[],int stall,int dist, int cows){
    int lastPos = arr[0];
    int cnt = 1;
    for(int i = 1; i < stall; i++){
        if(arr[i] - lastPos >= dist)
        {
            lastPos = arr[i];
            cnt++;
        }
        if(cnt >= cows) return true;
    }
    return false;
}

int32_t main()
{
    int tests;
    cin >> tests;
    while(tests--){
        int stall,cow;
        cin >> stall >> cow;
        int arr[stall];
        for(int i = 0; i < stall; i++){
            cin >> arr[i];
        }

        sort(arr,arr+stall);
        
        int low = 0;
        int high = arr[stall-1] - arr[0];
        int ans = -1;
        while(low <= high){
            int mid = low + (high-low)/2; 
            if(goruKothakar(arr,stall,mid,cow)){
                ans = mid;
                low = mid+1;
            }else{
                high = mid-1;
            }
        }
        cout << ans << endl;
    }

}

// 1 
// 5 3
// 1 2 8 4 9
// 1 2 4 8 9
// 1 2 3
// 3


// 1 2 3 4 5 6 7 8 9


// 10 + 10 - 10 / 2 = 