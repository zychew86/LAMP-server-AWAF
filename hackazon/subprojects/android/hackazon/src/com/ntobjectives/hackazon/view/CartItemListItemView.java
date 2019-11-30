package com.ntobjectives.hackazon.view;

import android.content.Context;
import android.view.LayoutInflater;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import com.ntobjectives.hackazon.R;
import com.ntobjectives.hackazon.model.CartItem;
import com.octo.android.robospice.spicelist.SpiceListItemView;

/**
 * Created with IntelliJ IDEA by Nick Chervyakov.
 * User: Nikolay Chervyakov
 * Date: 25.10.2014
 * Time: 17:35
 */
public class CartItemListItemView extends RelativeLayout implements SpiceListItemView<CartItem> {
    protected CartItem item;
    protected TextView priceField;
    protected TextView nameField;
    protected TextView quantityField;

    public CartItemListItemView(Context context) {
        super(context);
        inflateView(context);
    }

    private void inflateView(Context context) {
        LayoutInflater.from(context).inflate(R.layout.cart_item_list_item, this);
        this.priceField = (TextView) this.findViewById(R.id.price);
        this.nameField = (TextView) this.findViewById(R.id.name);
        this.quantityField = (TextView) this.findViewById(R.id.quantity);
    }

    @Override
    public CartItem getData() {
        return item;
    }

    @Override
    public ImageView getImageView(int i) {
        return null;
    }

    @Override
    public int getImageViewCount() {
        return 0;
    }

    @Override
    public void update(CartItem item) {
        this.item = item;
        this.priceField.setText("$" + Double.toString(item.price));
        this.nameField.setText(item.name.trim());
        this.quantityField.setText(Integer.toString(item.qty));
    }
}
