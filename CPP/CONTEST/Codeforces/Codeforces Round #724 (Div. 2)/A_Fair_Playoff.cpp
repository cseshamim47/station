#include <bits/stdc++.h>
using namespace std;

int main()
{
    int n;
    cin >> n;
    int arr[n];
    int count = 1;
    while(n--){
        for(int i = 0; i < 4; i++){
            cin >> arr[i];

            if(count == 4){
                int ab = max(arr[0],arr[1]);
                int cd = max(arr[2],arr[3]);
                int minn = min(ab,cd);
                int flag = 0;
                for(int i = 0; i < 4; i++){
                    if(arr[i] != ab && arr[i] != cd && arr[i] > minn){
                        cout << "NO\n";
                        flag++;
                        break;
                    }
                    if(i == 3 && flag == 0) cout << "YES\n";
                }
                count = 1;
                break;
            }
            count++;

        }
    }
}